<p class="text-muted">显示 {{ ($result->currentPage()-1)*$result->perPage() }}
    - {{ $result->currentPage()*$result->perPage() }}, 总计 {{ $result->total() }} </p>