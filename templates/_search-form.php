<template id="search-form">
<div class="search_form">
                    <form action="#">
                    <input class="form-control input-sm" 
        type="text" name="search" 
        placeholder="search term..."
        v-on:keyup.enter="doSearch"
        v-model="searchTerm"
/>
                        <button type="submit" class="searchsubmit"/>
                            <span class="icon">
                                <i class="fas fa-search"></i>
                            </span>   
                        </button>
                    </form>
                </div>
</template>

