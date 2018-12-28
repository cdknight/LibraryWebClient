<div class="requests-table">

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Book Name</th>
            <th scope="col">Date Requested</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($requestsList as $request)
            <tr>
                <td>{{ $request->book->Title }}</td>
                <td>{{ $request->date_out }}</td>

                <!-- STATUSES: 0: processing, 1: checked out, 2: ready; TODO put in Requests class-->


                @if ($request->status == 0)
                    <td>The item is processing for pick up.</td>

                @elseif ($request->status == 1)
                    <td>The item is currently checked out.</td>

                @elseif($request->status == 2)
                    <td>The item is ready for pick up.</td>

                @endif

                <td>
                    <button class="btn btn-danger">Cancel Request</button>
                </td>

            </tr>
        @endforeach

        </tbody>

    </table>

</div>