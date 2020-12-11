import React, {useEffect, useState} from 'react';
import ReactDOM from 'react-dom';

function Create(props) {
    const [bands, setBands] = useState([]);
    const [albums, setAlbums] = useState([]);
    const [bandId, setBandId] = useState('');

    const getBands = async () => {
        let response = await axios.get('/bands/table');
        setBands(response.data);
    }

    const getAlbumBySelectedBand = async (e) => {
        setBandId(e.target.value);
        let response = await axios.get(`/albums/get-album-by-${e.target.value}`);
        setAlbums(response.data);
    }

    const store = async (e) => {
        e.preventDefault();
        // let response = await axios.post(props.endpoint);
        // console.log(response.data);
    }

    useEffect(() => {
        getBands();
    })

    return (
        <div className="card">
            <div className="card-header">New Lyric</div>
            <div className="card-body">
                <form onSubmit={store}>
                    <div className="form-group">
                        <label htmlFor="band">Band</label>
                        <select onChange={getAlbumBySelectedBand} name="band" id="band" className="form-control">
                            <option value={null}>Choose a Band</option>
                            {
                                bands.map((band) => {
                                return <option key={band.id} value={band.id}>{band.name}</option>
                                })
                            }
                        </select>
                    </div>
                    {
                        albums.length ? 
                        <div className="form-group">
                            <label htmlFor="album">Album</label>
                            <select name="album" id="album" className="form-control">
                                <option value={null}>Choose an Album</option>
                                {
                                    albums.map((album) => {
                                    return <option key={album.id} value={album.id}>{album.name}</option>
                                    })
                                }
                            </select>
                        </div>
                        : ''
                    }
                    <button type="submit" className="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    );
}

export default Create;

if (document.getElementById('create-lyric')) {
    var item = document.getElementById('create-lyric');
    var endpoint = item.getAttribute('endpoint');
    ReactDOM.render(<Create endpoint={endpoint} />, item);
}
