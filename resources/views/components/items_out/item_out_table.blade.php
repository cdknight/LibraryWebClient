<div class="items-out-table">

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Book Name</th>
            <th scope="col">Date Checked Out</th>
            <th scope="col">Date Due</th>
            <th scope="col">Fine</th>
            <th scope="col">Renewals Remaining</th>
            <th scope="col">Renew</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($itemsOutList as $itemOut)
            <tr>
                <td>{{ $itemOut->book->Title }}</td>
                <td>{{ $itemOut->date_out }}</td>
                <td>{{ $itemOut->date_due }}</td>
                <td>{{ $itemOut->fine }}</td>
                <td>{{ $itemOut->renewals_remaining }}</td>


                <td>

                    {{-- If the renewals remaining is zero, then the user cannot renew their books anymore. If this is the case, then we will present them with a tooltip and a red, disabled button. --}}

                    @if ( $itemOut->renewals_remaining == 0 )

                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="You cannot renew this book anymore.">
                            <button class="btn btn-primary btn-danger" style="pointer-events: none;" type="button" disabled>Renew</button>
                        </span>

                    @else

                        <button class="btn btn-success openRenewModalButton" data-toggle="modal" data-target="#renewItemModal" data-itemoutid="{{ $itemOut->id }}">Renew</button>

                    @endif


                </td>

            </tr>
        @endforeach

        </tbody>

    </table>



</div>
