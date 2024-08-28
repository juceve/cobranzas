<?php

namespace App\Http\Controllers;

use App\Imports\ExcelEmpresasImport;
use App\Models\Deuda;
use App\Models\Deudore;
use App\Models\Empresa;
use App\Models\Movimiento;
use App\Models\Nuevadeuda;
use App\Models\Registroact;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class UpdDbEmpresasController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:empresas.upddb')->only('index', 'upload');
    }

    public function index($empresa_id)
    {
        $registroact = Registroact::where('empresa_id', $empresa_id)->orderBy('id', 'DESC')->first();
        return view('empresa.upddb', compact('empresa_id', 'registroact'));
    }

    public function upload(Request $request, $empresa_id)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx|max:10240', // 10MB Max
        ]);

        DB::beginTransaction();
        try {
            $file = $request->file('file');
            $fecha = date('Ymd');
            $hora = date('His');
            $filename = $fecha . $hora . "." . $file->getClientOriginalExtension();

            if ($file->move('storage/excels/', $filename)) {
                // REGISTRA LOG DE SUBIDA DE ARCHIVOS
                $registroact = Registroact::create([
                    "url" => 'storage/excels/' . $filename,
                    "fecha" => date('Y-m-d'),
                    "hora" => date('H:i:s'),
                    "empresa_id" => $empresa_id,
                    "user_id" => Auth::user()->id
                ]);

                $spreadsheet = IOFactory::load('storage/excels/' . $filename);
                $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                $cabeceras = array_values($sheetData[1]);

                // CONTROL DE CABECERAS
                if (
                    $cabeceras[0] == "Fecha" &&
                    $cabeceras[1] == "NumDoc" &&
                    $cabeceras[2] == "Importe" &&
                    $cabeceras[3] == "Saldo" &&
                    $cabeceras[4] == "Vence" &&
                    $cabeceras[5] == "Antiguedad" &&
                    $cabeceras[6] == "Anticuacion" &&
                    $cabeceras[7] == "Rango" &&
                    $cabeceras[8] == "Cliente" &&
                    $cabeceras[9] == "cliLugar" &&
                    $cabeceras[10] == "entNombreJefeVendedor" &&
                    $cabeceras[11] == "entNombreSupervisor" &&
                    $cabeceras[12] == "entNombreVendedor" &&
                    $cabeceras[13] == "Plazo" &&
                    $cabeceras[14] == "FechaUltimoPago" &&
                    $cabeceras[15] == "ciuNombre" &&
                    $cabeceras[16] == "CodigoCliente" &&
                    $cabeceras[17] == "LimiteCredito" &&
                    $cabeceras[18] == "rutId" &&
                    $cabeceras[19] == "CoordenadaX" &&
                    $cabeceras[20] == "CoordenadaY" &&
                    $cabeceras[21] == "Telefono" &&
                    $cabeceras[22] == "Estado" &&
                    $cabeceras[23] == "DIRECCION"
                ) {
                    // VACIA TABLA DE NUEVAS DEUDAS
                    // Nuevadeuda::truncate();

                    $data = [];
                    $rowNumber = 0;
                    foreach ($sheetData as $row) {
                        if ($rowNumber++ == 0) continue; // Omitir la primera fila

                        // Convertir la fila con índices alfabéticos a índices numéricos
                        $numericIndexedRow = array_values($row);
                        $data[] = $numericIndexedRow;
                    }

                    foreach ($data as $item) {
                        if ($item[16]) {
                            if ($deudorP = Deudore::where('codigocliente', $item[16])->first()) {
                                // SI EXISTE EL DEUDOR VERIFICA LA DEUDA
                                if (!$deuda = Deuda::where('numdoc', $item[1])->first()) {
                                    // SI NO ESTA REGISTRADA LA DEUDA REGISTRA UNA NUEVA
                                    $fecha = new DateTime($item[0]);
                                    $fecha = $fecha->format('Y-m-d');
                                    $vence = new DateTime($item[4]);
                                    $vence = $vence->format('Y-m-d');
                                    $ultfecha = NULL;
                                    if ($item[14]) {
                                        $ultfecha = new DateTime($item[14]);
                                        $ultfecha = $ultfecha->format('Y-m-d');
                                    }

                                    // $fecha = strtotime($fecarray[0]);
                                    $deuda = Deuda::create([
                                        "fecha" => $fecha,
                                        "numdoc" => $item[1],
                                        "importe" => $item[2],
                                        "saldo" => $item[3],
                                        "saldointerno" => $item[3],
                                        "vence" => $vence,
                                        "antiguedad" => $item[5],
                                        "anticuacion" => $item[6],
                                        "rango" => $item[7],
                                        "cliente" => $item[8],
                                        "clilugar" => $item[9],
                                        "entnombrejefevendedor" => $item[10],
                                        "entnombresupervisor" => $item[11],
                                        "entnombrevendedor" => $item[12],
                                        "plazo" => $item[13],
                                        "fechaultimopago" => $ultfecha,
                                        "ciunombre" => $item[15],
                                        "deudore_id" => $deudorP->id,
                                        "limitecredito" => $item[17],
                                        "rutid" => $item[18],
                                        "coordenadax" => $item[19],
                                        "coordenaday" => $item[20],
                                        "telefono" => $item[21],
                                        "estado" => $item[22],
                                        "direccion" => $item[23],
                                        "direccioninterna" => $item[23],
                                    ]);

                                    // REGISTRA COMO NUEVA DEUDA
                                    Nuevadeuda::create([
                                        'deuda_id' => $deuda->id,
                                        'registroact_id' => $registroact->id,
                                    ]);

                                    // REGISTRA MOVIMIENTO POR SER NUEVA DEUDA
                                    $movimiento = Movimiento::create([
                                        'deuda_id' => $deuda->id,
                                        'user_id' => Auth::user()->id,
                                        'fecha' => $deuda->fecha,
                                        'saldoanterior' => 0,
                                        'saldonuevo' => $deuda->saldo,
                                        'fecultpagoanterior' => $deuda->fechaultimopago,
                                        'fecultpagonuevo' => $deuda->fechaultimopago,
                                        'rangoanterior' => $deuda->rango,
                                        'rangonuevo' => $deuda->rango,
                                        'observaciones' => "INICIO DE REGISTRO",
                                    ]);
                                } else {
                                    // SI ESTA REGISTRADA LA DEUDA REALIZA OPERACIONES DE ACTUALIZACION
                                    if ($deuda->saldo == $item[3]) {
                                        $deuda->ctrlupdate = 0;
                                        $deuda->save();
                                    } else {
                                        $ultfecha = NULL;
                                        if ($item[14]) {
                                            $ultfecha = new DateTime($item[14]);
                                            $ultfecha = $ultfecha->format('Y-m-d');
                                        }
                                        $vence = new DateTime($item[4]);
                                        $vence = $vence->format('Y-m-d');

                                        // REGISTRA MOVIMIENTO POR ENCONTRAR MODIFICACIONES
                                        $movimiento = Movimiento::create([
                                            'deuda_id' => $deuda->id,
                                            'user_id' => Auth::user()->id,
                                            'fecha' => date('Y-m-d'),
                                            'saldoanterior' => $deuda->saldo,
                                            'saldonuevo' => $item[3],
                                            'fecultpagoanterior' => $deuda->fechaultimopago,
                                            'fecultpagonuevo' => $ultfecha,
                                            'rangoanterior' => $deuda->rango,
                                            'rangonuevo' => $item[7],
                                            'observaciones' => "ACTUALIZACION DE DB",
                                        ]);

                                        $deuda->ctrlupdate = 1;
                                        $deuda->saldo = $item[3];
                                        $deuda->rango = $item[7];
                                        $deuda->fechaultimopago = $ultfecha;
                                        $deuda->plazo = $item[13];
                                        $deuda->vence = $vence;
                                        if ($item[3]==0) {
                                            $deuda->status=false;
                                        }
                                        $deuda->save();
                                    }
                                }
                            } else {
                                // SI NO ESTA REGISTRADO EL DEUDOR CREA NUEVO DEUDOR
                                $deudor = Deudore::create([
                                    "codigocliente" => $item[16],
                                    "cliente" => $item[8],
                                    "telfcelular" => $item[21],
                                    "ciudad" => $item[15],
                                    "empresa_id" => $empresa_id,
                                ]);
                                $fecha = new DateTime($item[0]);
                                $fecha = $fecha->format('Y-m-d');
                                $vence = new DateTime($item[4]);
                                $vence = $vence->format('Y-m-d');
                                $ultfecha = NULL;
                                if ($item[14]) {
                                    $ultfecha = new DateTime($item[14]);
                                    $ultfecha = $ultfecha->format('Y-m-d');
                                }

                                // REGISTRA LA DEUDA
                                $deuda = Deuda::create([
                                    "fecha" => $fecha,
                                    "numdoc" => $item[1],
                                    "importe" => $item[2],
                                    "saldo" => $item[3],
                                    "saldointerno" => $item[3],
                                    "vence" => $vence,
                                    "antiguedad" => $item[5],
                                    "anticuacion" => $item[6],
                                    "rango" => $item[7],
                                    "cliente" => $item[8],
                                    "clilugar" => $item[9],
                                    "entnombrejefevendedor" => $item[10],
                                    "entnombresupervisor" => $item[11],
                                    "entnombrevendedor" => $item[12],
                                    "plazo" => $item[13],
                                    "fechaultimopago" => $ultfecha,
                                    "ciunombre" => $item[15],
                                    "deudore_id" => $deudor->id,
                                    "limitecredito" => $item[17],
                                    "rutid" => $item[18],
                                    "coordenadax" => $item[19],
                                    "coordenaday" => $item[20],
                                    "telefono" => $item[21],
                                    "estado" => $item[22],
                                    "direccion" => $item[23],
                                    "direccioninterna" => $item[23],
                                ]);

                                // REGISTRA COMO NUEVA DEUDA
                                Nuevadeuda::create([
                                    'deuda_id' => $deuda->id,
                                    'registroact_id' => $registroact->id,
                                ]);

                                // REGISTRA MOVIMIENTO POR SER NUEVA DEUDA
                                $movimiento = Movimiento::create([
                                    'deuda_id' => $deuda->id,
                                    'user_id' => Auth::user()->id,
                                    'fecha' => $deuda->fecha,
                                    'saldoanterior' => 0,
                                    'saldonuevo' => $deuda->saldo,
                                    'fecultpagoanterior' => $deuda->fechaultimopago,
                                    'fecultpagonuevo' => $deuda->fechaultimopago,
                                    'rangoanterior' => $deuda->rango,
                                    'rangonuevo' => $deuda->rango,
                                    'observaciones' => "INICIO DE REGISTRO",
                                ]);
                            }
                        }
                    }
                    DB::commit();
                    return redirect()->route('empresas.updatedb', $empresa_id)->with('success', 'Proceso realizado correctamente');
                } else {
                    DB::rollBack();
                    return redirect()->route('empresas.updatedb', $empresa_id)->with('error', 'El archivo seleccionado no tiene el formato requerido.');
                }
            } else {
                DB::rollBack();
                return redirect()->route('empresas.updatedb', $empresa_id)->with('error', 'Operación cancelada.');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('empresas.updatedb', $empresa_id)->with('error', $th->getMessage());
        }
    }

    protected function formatFecha($stringFecha)
    {
        $arrFecha = explode("/", $stringFecha);
        $dia = str_pad($arrFecha[0], 2, "0", STR_PAD_LEFT);
        $mes = str_pad($arrFecha[1], 2, "0", STR_PAD_LEFT);
        $anio = substr($arrFecha[2], 0, 4);

        // $fecha = strtotime($stringFecha);
        $fecha = new DateTime($stringFecha);
        $fecha = $fecha->format('Y-m-d');

        return  $fecha;
    }
}
