<!-- Modal Trigger -->
{{-- <a class="waves-effect waves-light btn modal-trigger" href="#modal-form">Modal</a> --}}

<!-- Modal Structure -->
<div id="modal-form" class="modal" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <form method="post" class="form-horizontal" data-toggle="validator">
        {{ csrf_field() }} {{ method_field('POST') }}
      <div class="modal-content">
        <h4 class="modal-title">Add Comment</h4>
        <input type="hidden" name="id" id="id">
        <div class="row">
          <label for="content" class="col m3 control-label" data-error="wrong">Content</label>
          <div class="col m6">
            <input type="text" id="content" name="content" placeholder="Content" autofocus required>
          </div>
        </div>

        <div class="row">
          <label for="user" class="col m3 control-label" data-error="wrong">User</label>
          <div class="col m6">
            <input type="text" id="user" name="user" placeholder="User" autofocus required>
          </div>
        </div>

      </div>
    
    <div class="modal-footer">
      <button type="submit" class="btn btn-flat modal-open btn-raised blue">Add</button>
      <button type="button" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
    </div>
    </form>

</div>