{{ partial('partials/header') }}

<div class="app-main">

{{ partial('partials/navbar') }}

    <div class="app-main__outer">
        <div class="app-main__inner">
  
            {{ content() }}
            
        </div>

        {% include 'partials/footer.volt' %}

    </div>
</div>

