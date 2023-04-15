
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="users-view-image">
                    <img src="{{ $staff->photo=='default.png'?('../img_admin/default.png'):('../../img_admin/staff/'.$staff->photo) }}" 
                    style="max-height: 80px;width: auto;" alt="Personal">
                </div>
                <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                    <table>
                        <tbody><tr>
                            <td class="font-weight-bold">Nombre: </td>
                            <td>{{$staff->name.' '.$staff->paternal.' '.$staff->maternal}}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Correo: </td>
                            <td>{{$staff->email}}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Celular: </td>
                            <td>{{$staff->phone}}</td>
                        </tr>
                    </tbody></table>
                </div>
                <div class="col-12 col-md-12 col-lg-5">
                    <table class="ml-0 ml-sm-0 ml-lg-0">
                        <tbody><tr>
                            <td class="font-weight-bold">Estado: </td>
                            <td>{{$staff->state?'Activo':'Inactivo'}}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Rol: </td>
                            <td>{{$staff->rol}}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Pais: </td>
                            <td>{{$staff->country}}</td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
        </div>
    </div>