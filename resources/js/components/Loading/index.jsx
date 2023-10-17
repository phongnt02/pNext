import { GridLoader } from "react-spinners";

function Loading() {
    return (
        <div className="w-full h-80 flex items-center justify-center">
            <GridLoader
                color="#2563eb"
                loading
                margin={6}
                size={15}
            />
        </div>
    );
}

export default Loading;