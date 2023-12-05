<div class="account-nav bg-white rounded py-5">
    <h6 class="mb-4 px-4">Manage My Account</h6>
    <ul class="nav nav-tabs border-0 d-block account-nav-menu" role="tablist">
        <li>
            <a href="{{ route('customer.dashboard') }}" class="active">
                <span class="me-2">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.33333 1.99341H6C6.35362 1.99341 6.69276 2.13388 6.94281 2.38393C7.19286 2.63398 7.33333 2.97312 7.33333 3.32674V5.99341C7.33333 6.34703 7.19286 6.68617 6.94281 6.93622C6.69276 7.18627 6.35362 7.32674 6 7.32674H3.33333C2.97971 7.32674 2.64057 7.18627 2.39052 6.93622C2.14048 6.68617 2 6.34703 2 5.99341V3.32674C2 2.97312 2.14048 2.63398 2.39052 2.38393C2.64057 2.13388 2.97971 1.99341 3.33333 1.99341Z"
                            fill="#212B36"></path>
                        <path
                            d="M10 1.99341H12.6667C13.0203 1.99341 13.3594 2.13388 13.6095 2.38393C13.8595 2.63398 14 2.97312 14 3.32674V5.99341C14 6.34703 13.8595 6.68617 13.6095 6.93622C13.3594 7.18627 13.0203 7.32674 12.6667 7.32674H10C9.64638 7.32674 9.30724 7.18627 9.05719 6.93622C8.80714 6.68617 8.66667 6.34703 8.66667 5.99341V3.32674C8.66667 2.97312 8.80714 2.63398 9.05719 2.38393C9.30724 2.13388 9.64638 1.99341 10 1.99341Z"
                            fill="#212B36"></path>
                        <path
                            d="M6 8.66008H3.33333C2.97971 8.66008 2.64057 8.80055 2.39052 9.0506C2.14048 9.30065 2 9.63979 2 9.99341V12.6601C2 13.0137 2.14048 13.3528 2.39052 13.6029C2.64057 13.8529 2.97971 13.9934 3.33333 13.9934H6C6.35362 13.9934 6.69276 13.8529 6.94281 13.6029C7.19286 13.3528 7.33333 13.0137 7.33333 12.6601V9.99341C7.33333 9.63979 7.19286 9.30065 6.94281 9.0506C6.69276 8.80055 6.35362 8.66008 6 8.66008Z"
                            fill="#212B36"></path>
                        <path
                            d="M10 8.66008H12.6667C13.0203 8.66008 13.3594 8.80055 13.6095 9.0506C13.8595 9.30065 14 9.63979 14 9.99341V12.6601C14 13.0137 13.8595 13.3528 13.6095 13.6029C13.3594 13.8529 13.0203 13.9934 12.6667 13.9934H10C9.64638 13.9934 9.30724 13.8529 9.05719 13.6029C8.80714 13.3528 8.66667 13.0137 8.66667 12.6601V9.99341C8.66667 9.63979 8.80714 9.30065 9.05719 9.0506C9.30724 8.80055 9.64638 8.66008 10 8.66008Z"
                            fill="#212B36"></path>
                    </svg>
                </span>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('cart.index') }}" class="">
                <span class="me-2">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 12C5 12.5523 4.55228 13 4 13C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11C4.55228 11 5 11.4477 5 12Z"
                            fill="#212B36"></path>
                        <path
                            d="M7 11.94C7 11.4209 7.42085 11 7.94 11H20.06C20.5791 11 21 11.4209 21 11.94V12.06C21 12.5791 20.5791 13 20.06 13H7.94C7.42085 13 7 12.5791 7 12.06V11.94Z"
                            fill="#212B36"></path>
                        <path
                            d="M3 16.94C3 16.4209 3.42085 16 3.94 16H20.06C20.5791 16 21 16.4209 21 16.94V17.06C21 17.5791 20.5791 18 20.06 18H3.94C3.42085 18 3 17.5791 3 17.06V16.94Z"
                            fill="#212B36"></path>
                        <path
                            d="M3 6.94C3 6.42085 3.42085 6 3.94 6H20.06C20.5791 6 21 6.42085 21 6.94V7.06C21 7.57915 20.5791 8 20.06 8H3.94C3.42085 8 3 7.57915 3 7.06V6.94Z"
                            fill="#212B36"></path>
                    </svg>
                </span>
                View Cart
            </a>
        </li>
        <li>
            <a href="{{ route('customer.order.index') }}" class="">
                <span class="me-2">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 12C5 12.5523 4.55228 13 4 13C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11C4.55228 11 5 11.4477 5 12Z"
                            fill="#212B36"></path>
                        <path
                            d="M7 11.94C7 11.4209 7.42085 11 7.94 11H20.06C20.5791 11 21 11.4209 21 11.94V12.06C21 12.5791 20.5791 13 20.06 13H7.94C7.42085 13 7 12.5791 7 12.06V11.94Z"
                            fill="#212B36"></path>
                        <path
                            d="M3 16.94C3 16.4209 3.42085 16 3.94 16H20.06C20.5791 16 21 16.4209 21 16.94V17.06C21 17.5791 20.5791 18 20.06 18H3.94C3.42085 18 3 17.5791 3 17.06V16.94Z"
                            fill="#212B36"></path>
                        <path
                            d="M3 6.94C3 6.42085 3.42085 6 3.94 6H20.06C20.5791 6 21 6.42085 21 6.94V7.06C21 7.57915 20.5791 8 20.06 8H3.94C3.42085 8 3 7.57915 3 7.06V6.94Z"
                            fill="#212B36"></path>
                    </svg>
                </span>
                Order History
            </a>
        </li>

        <li>
            <a href="{{ route('customer.profile.index') }}" class="">
                <span class="me-2">
                    <svg width="12" height="16" viewBox="0 0 12 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.00007 7.6714C3.96403 7.6714 2.30762 6.0148 2.30762 3.97855C2.30762 1.94251 3.96407 0.286133 6.00007 0.286133C8.03629 0.286133 9.69289 1.94255 9.69289 3.97855C9.69289 6.0148 8.03629 7.6714 6.00007 7.6714ZM6.00007 1.47569C4.61996 1.47569 3.49717 2.59848 3.49717 3.97855C3.49717 5.35887 4.61996 6.48185 6.00007 6.48185C7.38036 6.48185 8.50334 5.35887 8.50334 3.97855C8.50334 2.59848 7.38036 1.47569 6.00007 1.47569Z"
                            fill="#5D6374"></path>
                        <path
                            d="M8.30755 15.7138H3.69245C1.65642 15.7138 0 14.0573 0 12.0213C0 9.98527 1.65645 8.32886 3.69245 8.32886H8.30755C10.3436 8.32886 12 9.98527 12 12.0213C12 14.0573 10.3436 15.7138 8.30755 15.7138ZM3.69245 9.51841C2.31234 9.51841 1.18955 10.6412 1.18955 12.0213C1.18955 13.4014 2.31234 14.5242 3.69245 14.5242H8.30755C9.68766 14.5242 10.8104 13.4014 10.8104 12.0213C10.8104 10.6412 9.68766 9.51841 8.30755 9.51841H3.69245Z"
                            fill="#5D6374"></path>
                    </svg>
                </span>
                Updated Profile
            </a>
        </li>

        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <a href="#" onclick="event.preventDefault();
                this.closest('form').submit();">
                    <span class="me-2">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.99256 4.80345e-05C6.90051 0.000953881 6.80954 0.0200661 6.72486 0.056324C6.64018 0.092582 6.56345 0.145268 6.49906 0.211345C6.43467 0.277423 6.38388 0.355642 6.34961 0.441455C6.31533 0.527268 6.29825 0.618997 6.29932 0.711451V6.33816C6.29937 6.5248 6.37322 6.70381 6.50463 6.83576C6.63605 6.96772 6.81426 7.04181 7.00008 7.04181C7.1859 7.04181 7.36411 6.96772 7.49552 6.83576C7.62694 6.70381 7.70079 6.5248 7.70084 6.33816V0.711451C7.70193 0.617724 7.68435 0.524709 7.64914 0.437903C7.61394 0.351097 7.56181 0.272215 7.49582 0.205936C7.42983 0.139657 7.35131 0.0873274 7.26489 0.0519641C7.17846 0.0166007 7.08587 -0.00104732 6.99256 4.80345e-05ZM11.0768 1.4105C11.054 1.40984 11.0312 1.4103 11.0084 1.41187C10.87 1.42367 10.7382 1.47658 10.6298 1.56383C10.5214 1.65107 10.4413 1.7687 10.3997 1.90181C10.3581 2.03491 10.3568 2.17749 10.396 2.31132C10.4353 2.44515 10.5133 2.56423 10.6201 2.65342C11.8328 3.68778 12.6 5.22732 12.6 6.95615C12.6 10.0778 10.1044 12.5938 7.00349 12.5938C3.90258 12.5938 1.40151 10.0778 1.40152 6.95615C1.40152 5.23732 2.15898 3.70824 3.35954 2.67401C3.42949 2.61404 3.48699 2.5408 3.52876 2.45851C3.57053 2.37622 3.59576 2.28649 3.603 2.19441C3.61024 2.10233 3.59935 2.00976 3.57096 1.92191C3.54256 1.83406 3.49722 1.75268 3.43751 1.68243C3.37781 1.61218 3.30491 1.55443 3.22298 1.51248C3.14106 1.47052 3.0517 1.44514 2.96003 1.43787C2.86835 1.4306 2.77615 1.44156 2.68869 1.47009C2.60122 1.49861 2.52021 1.54414 2.45027 1.60412C0.951587 2.89516 6.5878e-06 4.81954 0 6.95615C-6.29675e-06 10.8366 3.14463 14.0002 7.0035 14.0002C10.8624 14.0002 14.0002 10.8366 14.0002 6.95615C14.0001 4.80707 13.0392 2.87479 11.5253 1.58353C11.4008 1.47453 11.2419 1.41324 11.0768 1.4105Z"
                                fill="#5D6374"></path>
                        </svg>
                    </span>
                    Sign Out
                </a>
            </form>
        </li>
    </ul>
</div>
