
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://samayun.github.io">Samayun Chowdhury </a> 2020</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <!--**********************************
        Scripts
    ***********************************-->
    {{-- <script src="{{ asset('js/app.js') }} "></script> --}}
    {{-- <script src="{{ asset('js/quaxlab.min.js') }} "></script> --}}


    <script src="{{ asset('quaxlab/plugins/common/common.min.js') }}"></script> 
    <script src="{{ asset('quaxlab/js/custom.min.js') }}"></script>
    <script src="{{ asset('quaxlab/js/settings.js') }}"></script>
    <script src="{{ asset('quaxlab/js/gleek.js') }}"></script>
    <script src="{{ asset('quaxlab/js/styleSwitcher.js') }}"></script> 

    {{-- <script src="{{ asset('quaxlab/plugins/chart.js/Chart.bundle.min.js') }} "></script> --}}
    <!-- Circle progress -->
    {{-- <script src="{{ asset('quaxlab/plugins/circle-progress/circle-progress.min.js') }} "></script> --}}
    <!-- Datamap -->
    <script src="{{ asset('quaxlab/plugins/d3v3/index.js') }} "></script>
    <script src="{{ asset('quaxlab/plugins/topojson/topojson.min.js') }} "></script>
    <script src="{{ asset('quaxlab/plugins/datamaps/datamaps.world.min.js') }} "></script>
    <!-- Morrisjs -->
    <script src="{{ asset('quaxlab/plugins/raphael/raphael.min.js') }} "></script>
    <script src="{{ asset('quaxlab/plugins/morris/morris.min.js') }} "></script>
    <!-- Pignose Calender -->
    <script src="{{ asset('quaxlab/plugins/moment/moment.min.js') }} "></script>
    <script src="{{ asset('quaxlab/plugins/pg-calendar/js/pignose.calendar.min.js') }} "></script>
    <!-- ChartistJS -->
    {{-- <script src="{{ asset('quaxlab/plugins/chartist/js/chartist.min.js') }} "></script>
    <script src="{{ asset('quaxlab/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }} "></script> --}}

    <script src="{{ asset('quaxlab/js/dashboard/dashboard-1.js') }} "></script>

    @stack('scripts')
  
</body>

</html>