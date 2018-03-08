@extends('layouts.admin.index')

@section('conteudo')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-users" aria-hidden="true"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Visitas hoje</span>
                    <span class="info-box-number">410</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-users" aria-hidden="true"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Visitas esta semana</span>
                    <span class="info-box-number">1.410</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-users" aria-hidden="true"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Visitas este Mês</span>
                    <span class="info-box-number">13.648</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-users" aria-hidden="true"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Visitas Total</span>
                    <span class="info-box-number">93,139</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="spacodiv"></div>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-thermometer-three-quarters" aria-hidden="true"></i>

                    <h3 class="box-title">Os 10 termos mais buscados</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="list-group">
                        <li class="list-group-item"><span class="badge">15.345</span>poesia</li>
                        <li class="list-group-item"><span class="badge">14.990</span>amor</li>
                        <li class="list-group-item"><span class="badge">13.456</span>romance</li>
                        <li class="list-group-item"><span class="badge">13.455</span>filosofia</li>
                        <li class="list-group-item"><span class="badge">13.445</span>contos</li>
                        <li class="list-group-item"><span class="badge">12.455</span>politica</li>
                        <li class="list-group-item"><span class="badge">12.432</span>ciência</li>
                        <li class="list-group-item"><span class="badge">12.003</span>folclore</li>
                        <li class="list-group-item"><span class="badge">10.033</span>arte</li>
                        <li class="list-group-item"><span class="badge">10.002</span>história</li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <!-- ./col -->
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa fa-thermometer-three-quarters" aria-hidden="true"></i>

                    <h3 class="box-title">Os 10 títulos mais procurados</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="list-group">
                        <li class="list-group-item"><span class="badge">14.990</span>Dom Casmurro</li>
                        <li class="list-group-item"><span class="badge">13.456</span>O Pequeno Príncipe</li>
                        <li class="list-group-item"><span class="badge">13.455</span>Guerra e Paz</li>
                        <li class="list-group-item"><span class="badge">13.445</span>Os Miseráveis</li>
                        <li class="list-group-item"><span class="badge">12.455</span>História da Filosofia</li>
                        <li class="list-group-item"><span class="badge">12.432</span>O Corvo</li>
                        <li class="list-group-item"><span class="badge">12.003</span>A Divina Comédia</li>
                        <li class="list-group-item"><span class="badge">10.345</span>Crime e Castigo</li>
                        <li class="list-group-item"><span class="badge">10.033</span>Noite de Reis</li>
                        <li class="list-group-item"><span class="badge">10.002</span>Grande Sertão Veredas</li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- ./col -->
    </div>
@stop



