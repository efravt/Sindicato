
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="text-primary">Información de Socio</h4>
                <div class="row">
                    <div class="users-view-image">
                        <img src="{{ $staff->photo=='default.png'?('../img_admin/socio/default.png'):('../../img_admin/socio/'.$staff->foto) }}" 
                        style="max-height: 70px;width: auto;" alt="Personal">
                    </div>
                    <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold">Nombre: </td>
                                    <td>{{$staff->nombre.' '.$staff->paterno.' '.$staff->materno}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">CI: </td>
                                    <td>{{$staff->ci}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Ingreso: </td>
                                    <td>{{$staff->ingreso}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 col-md-12 col-lg-5">
                        <table class="ml-0 ml-sm-0 ml-lg-0">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold">Número: </td>
                                    <td><b class="text-danger">{{$staff->numero}}</b></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Fecha Registro: </td>
                                    <td><b class="text-primary">{{date('d-m-Y', strtotime($staff->created_at))}}</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-success">
            <div class="card-body">
                <h4 class="text-primary">Vehiculo Principal</h4>
                <div class="row">
                    {{-- <div class="users-view-image">
                        <img src="{{ $staff->photo=='default.png'?('../img_admin/socio/default.png'):('../../img_admin/socio/'.$staff->foto) }}" 
                        style="max-height: 80px;width: auto;" alt="Personal">
                    </div> --}}
                    <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                        <table>
                            <tbody><tr>
                                <td class="font-weight-bold">Marca: </td>
                                <td>{{$vehiculo->marca}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Color: </td>
                                <td>{{$vehiculo->color}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Modelo: </td>
                                <td>{{$vehiculo->modelo}}</td>
                            </tr>
                        </tbody></table>
                    </div>
                    <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                        <table class="ml-0 ml-sm-0 ml-lg-0">
                            <tbody><tr>
                                <td class="font-weight-bold">Capacidad: </td>
                                <td>{{$vehiculo->capacidad}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Clase: </td>
                                <td>{{$vehiculo->clase}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Tipo Vehiculo: </td>
                                <td>{{$vehiculo->tipo_vehiculo}}</td>
                            </tr>
                        </tbody></table>
                    </div>
                    <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                        <table class="ml-0 ml-sm-0 ml-lg-0">
                            <tbody><tr>
                                <td class="font-weight-bold">Categoria: </td>
                                <td>{{$vehiculo->categoria}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Llantas: </td>
                                <td>{{$vehiculo->llantas}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Placa: </td>
                                <td>{{$vehiculo->placa}}</td>
                            </tr>
                        </tbody></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>