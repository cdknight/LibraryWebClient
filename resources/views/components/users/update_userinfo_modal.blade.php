<div class="modal fade" id="updateUserInfoModal" role="dialog">



    <div class="modal-dialog-centered modal-dialog" role="document">
        <div class="modal-content">


            <div class="modal-header">

                {{-- This will be filled in by the JavaScript --}}

                <h5 class="modal-title"></h5>

            </div>


            <div class="modal-body">



                    <form id="updateUserInformation">

                        @csrf

                        {{-- This will be filled in by the JavaScript --}}

                        <input type="hidden" id="user_id" name="user_id" value="">
                        <input type="hidden" id="field_to_update" name="field_to_update" value="">
                        <p id="fieldnamefancy-info" class="d-none" data-fieldnamefancy=""></p>

                        <div class="form-group">

                            {{-- This will be filled in by the JavaScript --}}

                            <label id="new_value_label" for="new_value" class="col-form-label"></label>
                            <input id="new_value_input" class="form-control w-75" name="new_value">


                        </div>

                        <div class="form-group d-inline">
                            <input type="submit" id="submitUserInfoChange" class="btn btn-success" value="Update">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                    </form>

                <div class="afterUpdate">
                    <p class="alert" id="infoUpdateStatus"></p>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>




            </div>





        </div>


    </div>


</div>

<script src="{{ URL::asset('js/components/users/update_userinfo_modal.js') }}"></script>