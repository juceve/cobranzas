<div>
    <div>
        <h5 class="text-lightblue" title="Hora del Servidor BO"><strong><i><i class="fas fa-clock"></i> {{ $time
                    }}</i></strong></h5>
    </div>

    <script>
        document.addEventListener('livewire:load', function () {
            setInterval(function () {
                @this.updateTime();
            }, 1000);
        });
    </script>
</div>