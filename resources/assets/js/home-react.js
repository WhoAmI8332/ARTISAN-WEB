import ReactDOM from 'react-dom/client';
import React, { useEffect, useState } from "react";

function ConferencesList() {
    const [conferences, setConferences] = useState([]);
    const [isLoading, setIsLoading] = useState(false);
    const [error, setError] = useState(null);

    useEffect(() => {
        const fetchConferences = async () => {
            setIsLoading(true);
            try {
                const response = await fetch("/conferences/table");
                if (!response.ok) {
                    throw new Error("Failed to fetch conferences");
                }
                const data = await response.json();
                setConferences(data);
            } catch (error) {
                setError(error);
            } finally {
                setIsLoading(false);
            }
        };

        fetchConferences();
    }, []);

    // Render content based on state
    if (isLoading) {
        return <div>Loading conferences...</div>;
    }

    if (error) {
        return <div>Error: {error.message}</div>;
    }

    return (
        <div className="container">
            <div className="row">
                {conferences.map((conference) => (
                    <div key={conference.id} className="col-sm-3">
                        <div className="card">
                            <div className="card-body">
                                <h5 className="card-title">{conference.title}</h5>
                                <p className="card-text">{conference.user}</p>
                                <a href={`/home/${conference.id}`} className="btn btn-primary" onClick={() => console.log('Read more clicked for conference ' + conference.id)}>Read More</a>
                            </div>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    );
}

const root = document.getElementById("home-conf-card");
ReactDOM.createRoot(root).render(<ConferencesList />);