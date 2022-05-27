<div id="paginate" class="d-flex">
    <nav aria-label="Page navigation" class="">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="{{ $data->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            
            @for ($i = 1; $i <= $data->lastPage(); $i++)
                <li class="page-item {{ $data->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $data->url($i) }}">{{$i}}</a>
                </li>
            @endfor
    
            <li class="page-item">
                <a class="page-link" href="{{ $data->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>