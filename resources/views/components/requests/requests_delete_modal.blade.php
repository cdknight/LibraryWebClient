<div class="modal fade" id="deleteRequestModal" role="dialog">


    <div class="modal-dialog-centered modal-dialog" role="document">

        <div class="modal-content">


            <div class="modal-header">



                <h5 class="modal-title">Delete Request</h5>

            </div>


            <div class="modal-body modal-content">

                <p id="confirmPrompt">Are you sure you want to delete this request?</p>

                <div class="row" id="deleteConfirmation">

                    {{-- This will be filled in by the JavaScript --}}




                    <button id="deleteRequestConfirmation" class="btn btn-danger mx-2">Yes</button>
                    <button class="btn btn-secondary" data-dismiss="modal">No</button>

                </div>


                <div class="modal-content" id="deleteRequestStatusBox" style="display: none;">
                    <p id="deleteRequestStatus" class="alert"></p>
                    <button class="btn btn-secondary" data-dismiss="modal" onclick="location.reload()">Close</button>
                </div>

            </div>


        </div>


    </div>


</div>

<script src="{{ asset('js/components/requests/requests_delete_modal.js') }}"></script>