<div class="col-7">
    <div class="card pt-2">
        <div class="table-responsive">
            {!! $builder->table(['class' => 'table table-bordered'], true) !!}
        </div>
    </div>
</div>

@push('scripts')
{!! $builder->scripts() !!}
@endpush()