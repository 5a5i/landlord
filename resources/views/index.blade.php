@extends('layouts.app')
@section('title', 'Home')
@section('blade', 'welcome')
@section('content')



  <h1 class="mt-4">Score Board</h1>

{{ $table }}

  <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmationModalTitle">Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <form class="modal-footer-delete" action="" method="get">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>


<script type="text/javascript">
$(document).ready(function() {
  $("[id^=destroy-button]").click(function(e) {
    e.preventDefault();
      var index = parseInt($(this).attr("id").replace('destroy-button-',''), 10);
      // console.log(index);
      const $this = $(this);
      var message = $this.data('confirm');
      var form = $(this).parents('form:first');
      var action = form.attr('action');
      // console.log(action);
      const confirmationModal = $("#confirmationModal");
      confirmationModal.find(".modal-body").text(message);
      confirmationModal.modal("show");
      $('form.modal-footer-delete').attr('action',action);
  });
});
</script>
@endsection
