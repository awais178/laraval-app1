<div class="page-header">
    @if (!Theme::get('breadcrumbRendered', false))
        <div class="page-breadcrumbs">
            <div class="container-{{ $size ?? 'xxxl' }}">
                {!! Theme::partial('breadcrumbs') !!}
            </div>
        </div>
        @php
            Theme::set('breadcrumbRendered', true);
        @endphp
    @endif

    @if (!empty($withTitle) && !Theme::get('titleRendered', false))
       
        @php
            Theme::set('titleRendered', true);
        @endphp
    @endif
</div>
