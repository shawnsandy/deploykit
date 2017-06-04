<section>
    <div class="row">

        @foreach($servers as $key => $connection)


            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="text-uppercase"><i class="fa fa-power-off"></i> {{ $key }} Server</h4>
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
        @endforeach
    </div>
</section>


