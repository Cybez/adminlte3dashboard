<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <link rel="stylesheet" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
 

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Source Sans 3 Font -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />

    <!-- OverlayScrollbars -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}" />

    <!-- ApexCharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous" />

    <!-- jsVectorMap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous" />

</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!-- Wrapper -->
    <div class="app-wrapper">
        @include('AdminDashboard.layout.header')
        @include('AdminDashboard.layout.sidebar')

        @yield('content')

        @include('AdminDashboard.layout.footer')
    </div>
    <!-- End Wrapper -->

    <!-- JavaScript Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script src="{{ asset('dist/js/adminlte.js') }}"></script>

    <!-- Configure OverlayScrollbars -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarWrapper = document.querySelector('.sidebar-wrapper');
            if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: 'os-theme-light',
                        autoHide: 'leave',
                        clickScroll: true,
                    },
                });
            }
        });
    </script>

    <!-- SortableJS -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js" integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ=" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const connectedSortables = document.querySelectorAll('.connectedSortable');
            connectedSortables.forEach((connectedSortable) => {
                new Sortable(connectedSortable, {
                    group: 'shared',
                    handle: '.card-header',
                });
            });

            const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
            cardHeaders.forEach((cardHeader) => {
                cardHeader.style.cursor = 'move';
            });
        });
    </script>

    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>

    <script>
        const sales_chart_options = {
            series: [
                { name: 'Digital Goods', data: [28, 48, 40, 19, 86, 27, 90] },
                { name: 'Electronics', data: [65, 59, 80, 81, 56, 55, 40] }
            ],
            chart: {
                height: 300,
                type: 'area',
                toolbar: { show: false }
            },
            legend: { show: false },
            colors: ['#0d6efd', '#20c997'],
            dataLabels: { enabled: false },
            stroke: { curve: 'smooth' },
            xaxis: {
                type: 'datetime',
                categories: ['2023-01-01', '2023-02-01', '2023-03-01', '2023-04-01', '2023-05-01', '2023-06-01', '2023-07-01']
            },
            tooltip: { x: { format: 'MMMM yyyy' } }
        };

        new ApexCharts(document.querySelector('#revenue-chart'), sales_chart_options).render();
    </script>

<!-- Add jQuery (Required) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jsVectorMap -->
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js" integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y=" crossorigin="anonymous"></script>

    <script>
        const visitorsData = {
            US: 398, SA: 400, CA: 1000, DE: 500, FR: 760, CN: 300,
            AU: 700, BR: 600, IN: 800, GB: 320, RU: 3000
        };

        new jsVectorMap({
            selector: '#world-map',
            map: 'world',
            markers: Object.keys(visitorsData).map(country => ({
                name: country, coords: visitorsData[country]
            }))
        });
    </script>




</body>
</html>
