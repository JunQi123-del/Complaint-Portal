
<!-- resolve Modal -->
<div class="modal fade" style="margin-top: 300px;"data-backdrop="false" id="exampleModal2-{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-{{$ticket->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-{{$ticket->id}}">
                    @if($ticket->is_anonymous == 0)
                        <h2>{{$ticket->category}} ID {{$ticket->id}} </h2>
                    @else
                        <h2>Anonymous {{$ticket->category}} ID {{$ticket->id}} </h2>
                    @endif
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form class="form-inline justify-content-center" action = "admin/ticket/{{$ticket->id}}" method = "POST">
                    @csrf
                    <label>Status Changing to </label>
                    <div class="input-group mx-0 mx-md-3">
                        <select class="custom-select" aria-label="Default select example" style="align: center;" id="status" name="status">
                            <option value="To Be Reviewed">To be reviewed</option>
                            <option value="Investigating">Under investigating</option>
                            <option value="Resolved">Resolved</option>
                        </select>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type ="text/javascript">
function disableStatusButton() {
$statusBtn = document.getElementById("status");

    if($statusBtn == "Resolved")
    {
        document.getElementById("status").disabled = true;
    }  
}
window.onload = disableStatusButton;
</script>