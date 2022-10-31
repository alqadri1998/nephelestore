@extends('admin.layouts.app')

@section('head')
@endsection

@section('breadcrumb')
    @include('admin.includes.breadcrumb', [
        'title'     => __('admin.Backup'),
        'menu'      => [
            __('admin.Backup') => route('admin.backup.index'),
        ],
    ])
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="col-md-12 pull-right" style="margin-top: 20px;">
            <a href="{{ route('admin.backup.store') }}" class="btn btn-success" style="float: right;">{{  __('admin.Backup') }}</a>
            </div>
            <div class="card-body">
                <h2 style="text-align: center;">{{ __('admin.Backup') }}</h2>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center;vertical-align: middle;">
                                   {{  __('admin.Backup') }}
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                     {{  __('admin.date') }}
                                </th>
                                <th style="text-align: center;vertical-align: middle;">
                                    {{  t('Options') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($backups as $backup)
                            <tr>
                                <td style="text-align: center;vertical-align: middle;">
                                    {{ $backup->name }}
                                </td>
                                <td style="text-align: center;vertical-align: middle;">
                                    {{ $backup->created_at->format('d/m/Y') }}
                                </td>
                                <td style="text-align: center;vertical-align: middle;">
                                    <a href="{{ route('admin.backup.restore',$backup->id) }}" class="btn btn-success" style="margin-bottom: 3px">{{ __('admin.Restore') }}</a>
                                    <form action="{{ route('admin.backup.destroy',$backup->id) }}" method="post" style="display: inline;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit" class="btn btn-danger btn-delete" style="margin-bottom: 3px">{{ __('admin.delete') }}</button>
                                    </form>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ $backups->appends(request()->query())->links() }}
</div>

@endsection


