<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Company</h4>
                    <a href="{{ route('company.create') }}" class="btn btn-primary">Add</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        SN
                                    </th>
                                    <th>Logo</th>
                                    <th>Company Name</th>
                                    <th>Phone</th>
                                    <th>TEL</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>img</td>
                                    <td>CODE IT</td>
                                    <td>9876544567</td>
                                    <td>098765456</td>
                                    <td>sulihkhg@yhfk</td>
                                    <td><a href="#" class="btn btn-primary">Detail</a></td>
                                </tr>
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
