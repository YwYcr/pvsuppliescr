<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h2>Poyectos y Tareas</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php"><img src="bedicon.svg" alt="Bed Icon" style="height: 1rem;"></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right hidden-xs">
            <button class="btn btn-sm btn-primary " title="" data-toggle="modal" data-target="#addevent">Crear Tarea</button>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-hover table-custom spacing5">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th class="w60 text-right">Fecha Limite</th>
                            <th class="w100">Prioridad</th>
                            <th class="w60"><i class="icon-user"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox" checked="">
                                    <span>Product Event at New York</span>
                                </label>
                            </td>
                            <td class="text-right">Feb 12-2019</td>
                            <td><span class="badge badge-danger ml-0 mr-0">HIGH</span></td>
                            <td>
                                <div class="avtar-pic w30 bg-red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name"><span>SS</span></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox">
                                    <span>Product Event for new product</span>
                                </label>
                            </td>
                            <td class="text-right">Feb 18-2019</td>
                            <td><span class="badge badge-warning ml-0 mr-0">MED</span></td>
                            <td>
                                <img src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="w30 rounded" data-original-title="Avatar Name">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox" checked="">
                                    <span>Meeting with Team</span>
                                </label>
                            </td>
                            <td class="text-right">March 02-2019</td>
                            <td><span class="badge badge-success ml-0 mr-0">High</span></td>
                            <td>
                                <div class="avtar-pic w30 bg-indigo" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name"><span>JK</span></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox" checked="">
                                    <span>Product Event for new product</span>
                                </label>
                            </td>
                            <td class="text-right">March 20-2019</td>
                            <td><span class="badge badge-warning ml-0 mr-0">MED</span></td>
                            <td>
                                <img src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="w30 rounded" data-original-title="Avatar Name">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox">
                                    <span>Product Event for new product</span>
                                </label>
                            </td>
                            <td class="text-right">March 28-2019</td>
                            <td><span class="badge badge-success ml-0 mr-0">LOW</span></td>
                            <td>
                                <img src="../assets/images/xs/avatar2.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="w30 rounded" data-original-title="Avatar Name">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox">
                                    <span>Campaign performance tracking</span>
                                </label>
                            </td>
                            <td class="text-right">Apr 1</td>
                            <td><span class="badge badge-danger ml-0 mr-0">HIGH</span></td>
                            <td>
                                <img src="../assets/images/xs/avatar3.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="w30 rounded" data-original-title="Avatar Name">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="fancy-checkbox">
                                    <input type="checkbox" name="checkbox" checked="">
                                    <span>Campaign Launch!</span>
                                </label>
                            </td>
                            <td class="text-right">May 08</td>
                            <td><span class="badge badge-warning ml-0 mr-0">MED</span></td>
                            <td>
                                <div class="avtar-pic w30 bg-green" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name"><span>SP</span></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addevent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Nuevo Evento</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="form-line">
                        <input type="number" class="form-control round" placeholder="Event Date">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" class="form-control round" placeholder="Event Title">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-line">
                        <textarea rows="4" class="form-control no-resize" placeholder="Event Description..."></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-simple" data-dismiss="modal">Close</button>
                <button type="button" class="btn  btn-primary js-sweetalert" data-dismiss="modal" data-type="success">Guardar</button>
            </div>
        </div>
    </div>
</div>