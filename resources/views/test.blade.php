<form action="/calculate" method="POST">
    @csrf
    <label>Weight(kg)</label>
    <input type="text" name="weight">

    <label>State</label>
    <input type="text" name="state">

    <label>Length</label>
    <input type="text" name="length">

    <label>Height</label>
    <input type="text" name="height">

    <label>Weigt</label>
    <input type="text" name="width">

    <button>Calcualte</button>

</form>
