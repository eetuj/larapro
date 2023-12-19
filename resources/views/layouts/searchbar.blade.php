 <form class="search-form" action="{{route('search.events')}}" method="GET">
            <div class="input-group">
                <div class="input-group-text">
                    <i data-feather="search"></i>
                </div>
                <input type="text" class="form-control" id="navbarForm" name="query" placeholder="Search here...">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>