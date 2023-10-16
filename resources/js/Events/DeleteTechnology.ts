import {DeleteEvent} from "../Interfaces/DeleteEvent";
import Swal from "sweetalert2";
import axios from "axios";

export class DeleteTechnology implements DeleteEvent {
    delete(url) {
        Swal.fire({
            title: 'Estás seguro que deseas eliminarlo?',
            text: "No podrás revertir esta acción!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'cancelar',
            confirmButtonText: 'Sí, eliminarlo!'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete(url).then((result) => {
                    if (result.data) {
                        Swal.fire(
                            'Elminado!',
                            'La tecnología ha sido eliminada.',
                            'success'
                        ).then(() => {
                            location.reload()
                        })
                    }
                })
            }
        })
    }
}

export default {
    DeleteTechnology
}
