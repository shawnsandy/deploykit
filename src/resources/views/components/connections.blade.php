<div class="col-md-12">
    <h2>Servers </h2>
</div>
@foreach($servers as $key => $connection)
    <div class="div">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-capitalize"><i class="fa fa-cog"></i> {{ $key }}</h3>

                    <hr>

                    <p class="text-right">
                        <a href="/deploy/connection/{{ $key }}" class="btn btn-default btn-xs btn-primary">
                            Deploy
                        </a>
                        <a href="/deploy/connection/{{ $key }}?commands=migrate" class="btn btn-xs btn-success">
                            Migrate
                        </a>
                        <a href="/deploy/connection/{{ $key }}?commands=update" class="btn btn-xs btn-warning">
                            Update
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endforeach

