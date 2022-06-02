type AuthType = {
    id: number;
    uuid: string;
    first_name: string;
    last_name: string;
    email: string;
    email_verified_at: Date | null;
    timezone: string;
    profile_photo_path: string;
    default_organization_id: number | null;
    distance_system: string;
    isAuthenticated: boolean;
}

const initialAuth: AuthType = {
    id: 0,
    uuid: "",
    first_name: "",
    last_name: "",
    email: "",
    email_verified_at: null,
    timezone: "",
    profile_photo_path: "",
    default_organization_id: null,
    distance_system: "",
    isAuthenticated: false
}

export const useAuth = () => useState<AuthType>("auth", () => initialAuth);