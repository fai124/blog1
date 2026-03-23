<template>
    <!-- Main -->
    <div id="main">
        <!-- Post -->
        <PostComponent />

        <!-- Pagination -->
        <ul class="actions pagination">
            <li>
                <a href="" class="disabled button big previous"
                    >Previous Page</a
                >
            </li>
            <li><a href="#" class="button big next">Next Page</a></li>
        </ul>
    </div>

    <!-- Sidebar -->
    <SideBarComponent />
</template>
<script>
export default {
    name: 'HomePage',
};
</script>
