@if (count($errors))
    @foreach($errors->all() as $error)
        <div class="am-alert am-alert-danger" data-am-alert style="margin:10px">
            <button type="button" class="am-close">&times;</button>
            {{ $error }}
        </div>
    @endforeach
@endif