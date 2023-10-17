import {DeleteEvent} from "@/Interfaces/DeleteEvent";
import {DeleteService} from "@/Services/DeleteService";

export class DeleteProject implements DeleteEvent {
    delete(url: string): any {
        let deleteService = new DeleteService()
        deleteService.delete(url)
    }
}
