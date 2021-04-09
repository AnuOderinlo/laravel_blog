<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Do you really want to delete this user?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                
                <form action="{{ route('user.destroy',$user->id) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger" type="submit" >Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>