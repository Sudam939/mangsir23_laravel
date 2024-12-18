<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Advertises</h4>
                    <a href="{{ route('advertise.create') }}" class="btn btn-primary">Add New</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>
                                        SN
                                    </th>
                                    <th>Company Name</th>
                                    <th>Banner</th>
                                    <th>Contact</th>
                                    <th>Expire Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($advertises as $index => $advertise)
                                    <tr>
                                        <td>
                                            {{ ++$index }}
                                        </td>
                                        <td>
                                            {{ $advertise->company_name }}
                                        </td>
                                        <td>
                                            <a href="{{ $advertise->redirect_url }}" target="_blank">
                                                <img width="120" src="{{ asset($advertise->banner) }}"
                                                    alt="{{ $advertise->company_name }}">
                                            </a>
                                        </td>
                                        <td>
                                            {{ $advertise->contact }}
                                        </td>
                                        <td>
                                            {{-- {{ date('M-d, Y', strtotime($advertise->expire_date)) }} --}}
                                            {{$advertise->expire_date}}
                                        </td>
                                        <td>
                                            <form action="{{ route('advertise.destroy', $advertise->id) }}"
                                                method="advertise">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('advertise.edit', $advertise->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{--
    primary-blue
    success-green
    danger-red
--}}
