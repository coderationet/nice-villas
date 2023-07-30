<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    {{ __('front/contact-informations.title') }}
                </h5>
            </div>
            <div class="card-body">
                <ul>
                    <li>
                        Whatsapp : <a href="https://wa.me/{{ $item->whatsapp }}" target="_blank">{{ $item->whatsapp }}</a>
                    </li>
                    <li>
                        Phone : <a href="tel:{{ $item->phone }}" target="_blank">{{ $item->phone }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
