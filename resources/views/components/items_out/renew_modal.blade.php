<div class="modal fade" id="renewItemModal" role="dialog">


    <div class="modal-dialog-centered modal-dialog" role="document">

        <div class="modal-content">


            {{-- Modal header --}}

            <div class="modal-header">

                <h5 class="modal-title">Renew Book</h5>

            </div>


            {{-- Modal Content --}}

            <div class="modal-body modal-content">

                <p id="confirmPrompt">Are you sure you want to renew this book?</p>



                <div class="row" id="deleteConfirmation">


                    <script src="{{ asset('js/components/items_out/modal_renew_item_out.js') }}"></script>


                    <button class="btn btn-success mx-2" id="renewBookButton">Yes</button>
                    <button class="btn btn-secondary" data-dismiss="modal">No</button>

                </div>




                <div class="modal-content" id="deleteRequestStatusBox" style="display: none;">

                    {{-- This will be filled in by JavaScript --}}

                    <p id="deleteRequestStatus" class="alert"></p>
                    <button class="btn btn-secondary" data-dismiss="modal" onclick="location.reload()">Close</button>

                </div>

            </div>


        </div>


    </div>


</div>

<script src="{{ asset('js/components/requests/requests_delete_modal.js') }}"></script>