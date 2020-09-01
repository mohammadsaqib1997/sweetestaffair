<!-- Logout Modal-->
<div class="modal fade" id="delCatModal" tabindex="-1" role="dialog" aria-labelledby="delCatLabelModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delCatLabelModal">Are you sure!</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">You want to delete this item.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="{{ route('admin.delete-cats') }}"
                    onclick="event.preventDefault();document.getElementById('cat-del-form').submit();">Confirm</a>
            </div>
        </div>
    </div>
</div>
<form id="cat-del-form" method="POST" action="{{ route('admin.delete-cats') }}" style="display:none;">
    @csrf
    @method('delete')
    <input type="text" id="cat_del_id" name="cat_id" value="">
</form>