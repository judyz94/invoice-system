<template>
    <form v-bind="$attrs" class="form-inline" method="GET">
        <div class="form-group" id="searchForm">
            <select class="custom-select" name="filter" id="filter" v-model="filter" @select="clearSelectedValue">
                <option value="code" selected >Code</option>
                <option value="expedition_date" selected>Expedition date</option>
                <option value="due_date" selected>Due date</option>
                <option value="sale_description" selected >Sale description</option>
                <option value="state_id" selected>Status</option>
            </select>

            <input class="form-control" type="text" name="search" v-model="value" v-if="filter === 'code'" required>
            <input class="form-control" type="date" name="search" v-model="value" v-if="filter === 'expedition_date'" required>
            <input class="form-control" type="date" name="search" v-model="value" v-if="filter === 'due_date'" required>
            <input class="form-control" type="text" name="search" v-model="value" v-if="filter === 'sale_description'" required>
            <select class="custom-select" name="search" v-model="value" v-if="filter === 'state_id'">
                <option value="1">New</option>
                <option value="2">Overdue</option>
                <option value="3">Paid</option>
                <option value="4">Rejected</option>
                <option value="5">Pending</option>
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Search</button>
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" onClick="window.history.back();"> Refresh</button>
        </div>
    </form>

</template>

<script>
    export default {
        data: function() {
            return {
                value: null,
                filter: 'name',
            }
        },
        methods: {
            clearSelectedValue() {
                this.value = null;
            }
        }
    }
</script>
