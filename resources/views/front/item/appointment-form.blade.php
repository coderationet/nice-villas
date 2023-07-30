<div class="row mt-4">
    <div class="col-md-12">
        <div class="card bg-light">
            <div class="card-header">
                <h5 class="card-title mt-1">
                    {{ __('front/appointment-form.title') }}
                </h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name" class="fs-14">{{__('front/general.name')}}</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="email" class="fs-14">{{__('front/general.email')}}</label>
                    <input type="text" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="message">{{__('front/general.message')}}</label>
                    <textarea class="form-control" id="message" rows="3"></textarea>
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary float-left ms-auto">
                        {{__('front/general.send')}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
