<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h2>Calendario de Eventos</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php"><img src="bedicon.svg" alt="Bed Icon" style="height: 1rem;"></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Calendario</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right hidden-xs">
            <button class="btn btn-sm btn-primary " title="" data-toggle="modal" data-target="#addevent">Nuevo Evento</button>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="row clearfix">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Todo List</h2>
                </div>
                <div class="body">
                    <ul class="todo_list list-unstyled">
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox" checked>
                                <span>Product Event at New York</span>
                            </label>
                            <a href="javascript:void(0);" class="todo-delete"><i class="icon-trash"></i></a>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox" checked>
                                <span>Meeting with Team</span>
                            </label>
                            <a href="javascript:void(0);" class="todo-delete"><i class="icon-trash"></i></a>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox">
                                <span>Product Event for new product</span>
                            </label>
                            <a href="javascript:void(0);" class="todo-delete"><i class="icon-trash"></i></a>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox" checked>
                                <span>Lunch friends in Sunday</span>
                            </label>
                            <a href="javascript:void(0);" class="todo-delete"><i class="icon-trash"></i></a>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox">
                                <span>Meeting with Team</span>
                            </label>
                            <a href="javascript:void(0);" class="todo-delete"><i class="icon-trash"></i></a>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox">
                                <span>Product Event for new product</span>
                            </label>
                            <a href="javascript:void(0);" class="todo-delete"><i class="icon-trash"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="body">
                    <div id="calendar"></div>
                </div>
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
</div>