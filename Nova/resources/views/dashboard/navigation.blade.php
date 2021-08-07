<router-link exact tag="h3"
    :to="{
        name: 'dashboard.custom',
        params: {
            name: 'main'
        }
    }"
    class="cursor-pointer flex items-center font-normal dim text-white mb-8 text-base no-underline">
    <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20"><defs><path id="b" d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"/><filter id="a" width="135%" height="135%" x="-17.5%" y="-12.5%" filterUnits="objectBoundingBox"><feOffset dy="1" in="SourceAlpha" result="shadowOffsetOuter1"/><feGaussianBlur in="shadowOffsetOuter1" result="shadowBlurOuter1" stdDeviation="1"/><feColorMatrix in="shadowBlurOuter1" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.166610054 0"/></filter></defs><g fill="none" fill-rule="evenodd"><use fill="#000" filter="url(#a)" xlink:href="#b"/><use fill="white" xlink:href="#b"/></g></svg>
    <span class="text-warning sidebar-label">{{ __('Home') }}</span>
</router-link>
@if (\Laravel\Nova\Nova::availableDashboards(request()))
    <ul class="list-reset mb-8">
        @foreach (\Laravel\Nova\Nova::availableDashboards(request()) as $dashboard)
            <li class="leading-wide mb-4 ml-8 text-sm">
                <router-link :to='{
                    name: "dashboard.custom",
                    params: {
                        name: "{{ $dashboard::uriKey() }}",
                    },
                    query: @json($dashboard->meta()),
                }'
                exact
                class="text-white no-underline dim">
                    {{ $dashboard::label() }}
                </router-link>
            </li>
        @endforeach
    </ul>
@endif
