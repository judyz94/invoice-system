<template>
    <form v-bind="$attrs" class="form-inline">
        <div class="form-group">
            <select class="custom-select" name="type" id="filter" v-model="filter" @select="clearSelectedValue">
                <option value="code">Code</option>
                <option value="expedition_date">Expedition date</option>
                <option value="due_date">Due date</option>
                <option value="sale_description">Sale description</option>
                <option value="status">Status</option>
            </select>

            <input class="form-control" type="text" name="searchfor" v-model="value" v-if="filter === 'code'" required>
            <input class="form-control" type="date" name="searchfor" v-model="value" v-if="filter === 'expedition_date'" required>
            <input class="form-control" type="date" name="searchfor" v-model="value" v-if="filter === 'due_date'" required>
            <input class="form-control" type="text" name="searchfor" v-model="value" v-if="filter === 'sale_description'" required>
            <select class="custom-select" name="searchfor" v-model="value" v-if="filter === 'status'">
                <option value="New">New</option>
                <option value="Sent">Sent</option>
                <option value="Overdue">Overdue</option>
                <option value="Paid">Paid</option>
                <option value="Cancelled">Cancelled</option>
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
