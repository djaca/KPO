<script>
  export default {
    name: 'Taxpayers',

    props: ['items'],

    data () {
      return {
        taxpayers: [],
        selected: ''
      }
    },

    methods: {
      async remove (id) {
        if (confirm('Are you sure you want to delete this item?')) {
          let { status } = await axios.delete(`/taxpayers/${id}`)

          if (status === 200) {
            this.taxpayers.splice(this.taxpayers.findIndex(t => t.id === id), 1)
          }
        }
      },

      select (id) {
        this.selected = id
      },

      choose () {
        if (this.selected !== '') {
          this.$cookie.set('taxpayer', this.selected, 1)

          window.location.href = `/`
        }
      }
    },

    mounted () {
      this.taxpayers = this.items

      let taxpayer = this.$cookie.get('taxpayer')

      if (taxpayer) {
        this.selected = parseInt(taxpayer)
      }
    }
  }
</script>
