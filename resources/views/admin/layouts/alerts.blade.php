@if (Session::get('success'))
    <div class="col-12" id="here">
        <div class="alert alert-success">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                <i class="nc-icon nc-simple-remove"></i>
            </button>
            <span>{{ Session::get('success') }}</span>
        </div>
    </div>
@endif

@if (Session::get('warning'))
    <div class="col-12" id="here">
        <div class="alert alert-warning">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                <i class="nc-icon nc-simple-remove"></i>
            </button>
            <span>{{ Session::get('warning') }}</span>
        </div>
    </div>
@endif

@if (Session::get('error'))
    <div class="col-12" id="here">
        <div class="alert alert-danger">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                <i class="nc-icon nc-simple-remove"></i>
            </button>
            <span>{{ Session::get('error') }}</span>
        </div>
    </div>
@endif