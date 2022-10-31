<div class="table-responsive">
    <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
        <thead>
            <tr>
                @foreach($headers as $header)
                    <th style="text-align: center;">{{ $header }}</th>
                @endforeach
                @if($withOptions)
                    <th style="min-width: 150px;text-align: center;">{{ __('admin.Options') }}</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    @foreach($fields as $field)
                        <td style="text-align: center;">
                            {{ $item->$field }}
                        </td>
                    @endforeach
                    @if($withOptions)
                        <td style="text-align: center;width: 160px;">                            
                            @include('admin.includes.actions', [
                                'show'      => route('admin.' . $model . '.show', $item->id),
                                'edit'      => route('admin.' . $model . '.edit', $item->id),
                                'destroy'   => route('admin.' . $model . '.destroy', $item->id),
                                'permission'=> $model
                            ])
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>