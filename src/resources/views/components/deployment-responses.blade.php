<section>

    <div class="row">

        <div class="col-md-12">

            <div class="panel">
                <h3>
                    <i class="fa fa-telegram"></i> Deployments Responses
                    <div class="badge">{{ $deployed->total() }}</div>
                </h3>
            </div>

            @foreach($deployed as $deploy)

                <div class="panel panel-default {{ ($deploy->created_at->diffInSeconds() <= 300 ) ? "new-deploy" : "" }}">
                    <div class="panel-body text-capitalize">
                        <div class="col-md-2 ">
                            <i class="fa fa-server"></i> {{ $deploy->connection }}
                        </div>
                        <div class="col-md-8">{{ str_limit($deploy->responses, 200) }}</div>
                        <div class="col-md-2">
                            <i class="fa fa-clock-o"></i> {{ $deploy->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>

            @endforeach

        </div>

    </div>
</section>

<section>
 <div class="row">
     <div class="col-md-12">{{ $deployed->links() }}</div>
 </div>
</section>



@push('inline-styles')
<style>
    .new-deploy {
        border: 2px solid green !important;
        background-color: lightgrey;
    }
</style>
@endpush
