<x-auth.layout>
    <x-slot name="title">Home</x-slot>
    <div class="card">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card-body">
                    <h4 class="card-title display-6 mb-4 text-truncate lh-sm">Halo {{ Auth()->user()->name }}!🎉</h4>
                    <p class="mb-0">Semoga kamu dapat menyelesaikan setiap tugas yang ada di hadapanmu dengan baik,
                        menjalankannya dengan penuh semangat dan dedikasi, serta meraih hasil yang memuaskan.
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-6 position-relative text-center align-self-end">
                <img src="https://demos.themeselection.com/materio-bootstrap-html-admin-template/assets/img/front-pages/landing-page/sitting-girl-with-laptop.png"
                    class="card-img-position bottom-0 w-25 end-0 scaleX-n1-rtl" alt="View Profile">
            </div>
        </div>
    </div>

</x-auth.layout>
