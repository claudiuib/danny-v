{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Users" icon="la la-users" :link="backpack_url('user')" />
<x-backpack::menu-item title="Portfolios" icon="la la-images" :link="backpack_url('portfolio')" />
<x-backpack::menu-item title="Services" icon="la la-cogs" :link="backpack_url('service')" />
<x-backpack::menu-item title="Contact Information" icon="la la-phone" :link="backpack_url('contact-info')" />
<x-backpack::menu-item title="Visitors" icon="la la-chart-line" :link="backpack_url('visitor')" />
<x-backpack::menu-item title="Main Page Content" icon="la la-file-text" :link="backpack_url('main-page-content')" />
<x-backpack::menu-item title="About Page Content" icon="la la-info-circle" :link="backpack_url('about-page-content')" />