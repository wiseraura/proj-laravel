<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">{{ $breadcrumbName[0] ?? '' }}</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        @foreach ($breadcrumbName as $item)
                            <li class="breadcrumb-item" aria-current="page">{{ $item }}</li>
                        @endforeach
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div> 
